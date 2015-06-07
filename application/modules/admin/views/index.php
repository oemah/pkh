<html>
    <body>
        <form action="<?=base_url('admin/ex')?>" method="post" enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file"><br/>
            <input type="submit" name="submit" value="Submit">
        </form>    
    </body>
</html>