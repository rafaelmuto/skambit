/*!
 * == HTML5 Image Preview ==
 * Created By: Tomas Dostal
 * Version: 1.0 (05-12-2012)
 * Documentation: http://tomasdostal.com/projects/html5ImagePreview
 *
 * HTML structure:
 *	<div>
 *		<input type="file" name="imagefile" onchange="previewImage(this,{256,128,64},5)">
 *		<div class="imagePreview"></div>
 *	</div>
 *
 */

function previewImage(el,widths,limit){
	var files = el.files;
	var wrap = el.parentNode;
	var output = wrap.getElementsByClassName('imagePreview')[0];
	var allowedTypes = ['JPG','JPEG','GIF','PNG','SVG','WEBP'];

	output.innerHTML='Carregando...';

	var file = files[0];
	var imageType = /image.*/;

	var img='';

	var reader = new FileReader();
	reader.onload = (function(aImg) {
		return function(e) {
			output.innerHTML='';

			var format = e.target.result.split(';');
			format = format[0].split('/');
    	format = format[1].split('+');
			format = format[0].toUpperCase();


			if (allowedTypes.indexOf(format)>=0 && e.total<(limit*1024*1024)){
				for (var size in widths){
					var image = document.createElement('img');
					var src = e.target.result;

					image.src = src;
					// image.width = widths[size];
					image.width = 200;
					image.title = 'Image preview '+widths[size]+'px';
					output.appendChild(image);
				}
			}
			output.appendChild(description);
		};

	})
	(img);
	reader.readAsDataURL(file);
}
