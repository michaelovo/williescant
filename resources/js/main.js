import Swal from 'sweetalert2';
(function ($) {
  $(document).on('ready', function () {
    // Tooltips & Popovers
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    // Dismiss Popovers on next click
    $('.popover-dismiss').popover({
      trigger: 'focus',
    });

    // Datatables integration
    $('.table_dt').DataTable();

    // Custom Scroll
    $('.u-sidebar').mCustomScrollbar({
      scrollbarPosition: 'outside',
      scrollInertia: 150,
    });

    //Removing images from add product modal view
    $(document).on('click', '.deleteImageBtn', function () {
      var image = $(this).attr('data-id');
      $(this).parent().remove();
      var images = document.getElementById('add-image').files;
      images[image]['isvalid'] = false;
      var inputValid = false;
      for (var img of images) {
        if (img['isvalid'] == true) {
          inputValid = true;
        }
      }
      if (!inputValid) {
        images = Array.from(images);
        document.getElementById('add-image').value = '';
      }
    });

    //Removing images from edit Product modal view
    $(document).on('click', '.deleteEditImageBtn', function () {
      var image = $(this).attr('data-id');
      $(this).parent().remove();
      var images = document.getElementById('edit-image').files;
      images[image]['isvalid'] = false;

      var inputValid = false;
      for (var img of images) {
        if (img['isvalid'] == true) {
          inputValid = true;
        }
      }
      var oldItemCount = parseInt($('#edit-image').attr('oldImgCount'));
      if (!inputValid && oldItemCount < 1) {
        images = Array.from(images);
        document.getElementById('edit-image').value = '';
      }
    });
  });
})(jQuery);

// A Swal mixin for timed alerts.
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer);
    toast.addEventListener('mouseleave', Swal.resumeTimer);
  },
});

/**
 * Image Preview Function.
 * Renders the images preview to add and edit product forms
 */
var imagesPreview = function (input, placeToInsertImagePreview, type, previewDimensions=null) {
  $(placeToInsertImagePreview).html(``); //Clear Preview after every Image selection..
  if (input.files) {
    // console.log(input.files)
    var action = type == 'add' ? 'deleteImageBtn' : 'deleteEditImageBtn';
    var filesAmount = input.files.length;
    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();
      var count = 0;
      var file = input.files[i];
      reader.onload = function (event) {
        var imgContainer = $(
          $.parseHTML(`
          <div class="card form-group col-md-5 mr-1 mt-2">
          </div>
          `)
        );
        let height = 75;
        let width = "100%";
        if(previewDimensions) {
          width = previewDimensions.width;
          height = previewDimensions.height;
        }
        var image = $(
          $.parseHTML(
            `<img alt="${file['name']}" id="${action}-image-preview__item" height="${height}" width=${width}>`
          )
        ).attr('src', event.target.result);
        image.appendTo($(imgContainer));

        var deleteBtn = $(
          $.parseHTML(
            `
            <button class="btn btn-sm btn-outline-danger mt-1 ${action}" img-name="${file['name']}" type="button">
              Remove
            </button>
            `
          )
        ).attr('data-id', count);
        deleteBtn.appendTo(imgContainer);

        imgContainer.appendTo(placeToInsertImagePreview);
        count += 1;
      };

      reader.readAsDataURL(input.files[i]);
      input.files[i]['isvalid'] = true; // A check to confirm which image actually gets send to backend for processing.
    }
  }
};

/**
 * Calculates the monthly date boundaries and returns the first and the last date of the
 * current month.
 */
function getMonthDateBounds() {
  var today = new Date();
  m = today.getMonth();
  y = today.getFullYear();
  start = new Date(y, m, 1); //first day of current month
  end = new Date(y, m + 1, 0); //last day of current month
  startDateString = `${start.getFullYear()}-${
    start.getMonth() + 1
  }-${start.getDate()}`;
  endDateString = `${end.getFullYear()}-${end.getMonth() + 1}-${end.getDate()}`;
  return [startDateString, endDateString];
}

/**
 * Validates form inputs to check if there are empty fields on the required fields
 * @param {String} form
 * @param {Boolean} markInvalid
 */
function validateFormInputs(form, markInvalid = true) {
  let tabValid = true;
  let formFields = $(`#${form}`).find('input[required]');
  for (let i = 0; i < formFields.length; i++) {
    if ($(formFields[i]).val().length == 0) {
      if (markInvalid) {
        $(formFields[i]).addClass('is-invalid');
      }
      tabValid = false;
    } else {
      $(formFields[i]).removeClass('is-invalid');
    }
  }
  return tabValid;
}