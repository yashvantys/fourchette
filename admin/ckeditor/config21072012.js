
CKEDITOR.plugins.addExternal('fmath_formula', 'plugins/fmath_formula/', 'plugin.js');
	
		CKEDITOR.editorConfig = function( config )
		{
		       // Declare the additional plugin 
config.filebrowserUploadUrl = 'ckeditor/ckupload.php';
			config.extraPlugins = 'fmath_formula';
	
		       // Add the button to toolbar
			config.toolbar = [ 
			['Templates', 'Styles','Format','Font','FontSize','TextColor','BGColor','Maximize','Image'], 
			['Source'], 
			['fmath_formula'], 
			['Bold','Italic','Underline','Strike','-','Subscript','Superscript','-'], 
			['Table','HorizontalRule'], 
			['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']
		    ] 



		};