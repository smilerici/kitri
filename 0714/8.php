<html>
<head>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script>
$(document).ready(function(){
  var object = {name : 'RintIanTta'};

  $.extend(object, {
		gender: 'Male',
		part : 'Second Guiter'
	  });

  var output= '';
  $.each(object, function(key, item){
			output +=key+':'+item+'\n';
	  });
  alert(output);
});
      </script>
      </head>
      <body>
      </body>
      </html>