<br/>

<button class="btn btn-default" onclick="newPost()">Add post</button>
<a class="btn btn-default" href="?loc=list">Table of posts</a>

<hr/>

<div class="row">

    <div class="col-md-12">

        <?php include ("engine/alerts.php"); ?>

        <?php include ("engine/poststream.php"); ?>

    </div>

</div>

<script src="engine/dialogs/js/dialogs.js"></script>
