<div id="blog" class="container pt-5">

    <?php foreach ($posts as $post) { ?>
        <div class="row block-blog">
            <div class="row col-ms-12 col-md-12 col-lg-12">
                <h2><?= $this->clean($post->getTitle()); ?></h2>
            </div>
           <div class="row col-ms-12 col-md-12 col-lg-12">
               <p>
                   <?= $this->clean($post->getResume()); ?>
               </p>
           </div>
            <div class="row pl-5 pb-2 col-ms-12 col-md-9 col-lg-9">
                créé le <?php $date = $post->getcreatedAt();
                $dt = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                echo $this->clean($dt->format('d/m/Y'));
                ?>
                par <?= $this->clean($post->getUser()->getFirstname()); ?>
            </div>
            <div class="row pb-2 col-ms-12 col-md-3 col-lg-3">
                <a href="<?= HOST.'detail_post.html?postId='.$this->clean($post->getId()); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voir plus</a>
            </div>

        </div>
    <?php } ?>

</div>
