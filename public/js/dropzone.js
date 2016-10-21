/**
 * Created by Kaan on 10/20/2016.
 */
Dropzone.options.addImages = {
    maxFilesize: 2,
    acceptedFiles: 'image/*',
    success: function (file, response) {
       if(file.status == 'success'){
           handleDropzoneFileUpload.handleSuccess(response);
       }else{
           handleDropzoneFileUpload.handleError(response);
       }
    }
};

var handleDropzoneFileUpload = {
    handleError: function (response) {
        console.log(response);
    },
    handleSuccess: function (response) {
        var imageList = $('#gallery-images ul');
        var imageSrc = baseUrl + '/gallery/images/thumbs/' + response.file_name;
        $(imageList).append('<li><a href="' + imageSrc + '"><img src="' + imageSrc + '"></a> </li>');
    }
}