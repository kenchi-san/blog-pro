
<div class="container" style="height: 100%">
    <div class="row comment-block mt-5">
        <div class="col-ms-12 col-md-12 col-lg-12">
            <h3>Publié par: <?php echo $comment->getUser()->getUsername(); ?></h3>
            <small>date de création: <?php $date = $comment->getcreatedAt();
                $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                echo $dt->format('d/m/Y');
                ?></small>
        </div>
        <div class="col-ms-12 col-md-12 col-lg-12">
            <?php echo $this->clean($comment->getContent()); ?>
        </div>
    </div>
</div>


