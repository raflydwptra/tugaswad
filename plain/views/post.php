Posts - <a href="/">Home</a><br/><br/>
<h1>Welcome</h1>
<form method="post" action="/post/doPost" enctype="multipart/form-data"> <!-- Add enctype attribute for file upload -->
    <table>
        <tr>
            <td>UserId</td><td> : </td><td><input type="text" name="user_id" value="<?= isset($userid) ? $userid : "" ?>"/></td>
        </tr>
        <tr>
            <td>Content</td><td> : </td><td><input type="text" name="content"/></td>
        </tr>
        <tr>
            <td>Image</td><td> : </td><td><input type="file" name="image"/> 
        </tr>
        <tr>
            <td><input type="submit" value="Submit"/></td>
        </tr>
    </table>
</form>
<br/><br/>
<?php foreach($posts as $post): ?>
    <p>Post ID: <?php echo $post->getId(); ?>, Name: <?php echo $post->getContent(); ?></p>
    <!-- Display image here if you have the image URL in your database -->
    <img src="<?php echo $post->getImage(); ?>" alt="Post Image">
<?php endforeach; ?>
