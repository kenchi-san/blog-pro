<div class="row pl-5">
    <form action="[URL]" method="post">
        <textarea name="content" id="editor">
        </textarea>
        <p><input type="submit" value="Submit"></p>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</div>
