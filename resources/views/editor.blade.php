<html>
    <head>
        <!-- Include stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
         <!-- Include the Quill library -->
         <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    </head>
    <body>
 

        <!-- Create the editor container -->
        <div id="editor">
           
        </div>



        <!-- Initialize Quill editor -->
        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });
        </script>
       

    </body>
</html>