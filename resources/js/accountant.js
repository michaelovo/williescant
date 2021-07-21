$(document).ready(function(){
      // Setup nominate new accountant modal
  $('#nominateNewModal').on('show.bs.modal', () => {
    // First de-activate the next tab..
    $('#add-accountant-permissions-tab').attr('data-toggle', '');
    $('#add-accountant-permissions-tab').css({ cursor: 'not-allowed' });
    // Ensure that the details tab is selected and shown..
    $('#add-accountant-details-tab').attr('data-toggle', 'tab');
    $('#add-accountant-details-tab').css({ cursor: 'pointer' });
    $('#add-accountant-details-tab').tab('show');
    // then reset the form
    $('#nominate-new-form')[0].reset();
    // Then reset the navigation buttons
    $('#nominate-new-next')
      .removeClass('d-none')
      .attr('current-tab', 'details');
    $('#nominate-new-submit').addClass('d-none');
    $('#nominate-new-prev').attr('target_tab', '').addClass('d-none');
  });

  // Handle next button click on nominate new modal
  $('#nominate-new-next').click(() => {
    var tab_valid = true;
    var currentTab = $('#nominate-new-next').attr('current-tab');

    if (currentTab == 'details') {
      tab_valid = validateFormInputs('nominate-new-form');
      if (tab_valid) {
        // Now toggle the permissions tab to be visible
        $('#add-accountant-permissions-tab').attr('data-toggle', 'tab');
        $('#add-accountant-permissions-tab').css({ cursor: 'pointer' });
        $('#nominate-new-next').attr('current-tab', 'permissions');
        $('#add-accountant-permissions-tab').tab('show');
      }
    }
  });

  // Handle previous navigation
  $('#nominate-new-prev').click(() => {
    let targetTab = $('#nominate-new-prev').attr('target_tab');
    $(targetTab).tab('show');
  });

  // Listen to tab changes for each tab
  $('#add-accountant-details-tab').on('show.bs.tab', function (e) {
    $('#nominate-new-next').removeClass('d-none');
    $('#nominate-new-next').attr('current-tab', 'details');
    $('#nominate-new-submit').addClass('d-none');
    $('#nominate-new-prev').attr('target_tab', '');
    $('#nominate-new-prev').addClass('d-none');
  });

  $('#add-accountant-permissions-tab').on('show.bs.tab', function (e) {
    // Hide next button then make submit and previous buttons visible
    $('#nominate-new-next').addClass('d-none');
    $('#nominate-new-next').attr('current-tab', '');
    $('#nominate-new-submit').removeClass('d-none');
    $('#nominate-new-prev').attr('target_tab', '#add-accountant-details-tab');
    $('#nominate-new-prev').removeClass('d-none');
  });

  // Handle submit nominate-new-accountant form
  $('#nominate-new-form').submit((e) => {
    e.preventDefault();
    var formData = new FormData($('#nominate-new-form')[0]);
    $('#new-accountant-modal-success').addClass('d-none');
    $('#new-accountant-modal-errors').addClass('d-none');
    $.ajax({
      type: 'POST',
      url: '/supplier/staff/accountants/nominate-new.php',
      data: formData,
      processData: false,
      contentType: false,
      statusCode: {
        401: function (response) {
          window.location.href = '/auth/logout.php';
        },
      },
      success: function (res) {
        // Backend returns content-type json headers so no need of parsing JSON
        if (res['success']) {
          $('#new-accountant-modal-success').removeClass('d-none');
          $('#new-accountant-modal-errors').addClass('d-none');
          window.location.reload();
        } else {
          $('#new-accountant-modal-success').addClass('d-none');
          $('#new-accountant-modal-errors').removeClass('d-none');
          $('#new-accountant-modal-errors').find('span').text(res['error']);
        }
      },
      error: function (err) {
        $('#new-accountant-modal-success').addClass('d-none');
        $('#new-accountant-modal-errors').removeClass('d-none');
        $('#new-accountant-modal-errors')
          .find('span')
          .text(
            'Server Error. Failed to nominate accountant. Try again later.'
          );
      },
    });
  });
})