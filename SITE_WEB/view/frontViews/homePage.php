<div class="container-fluid">
    <div class="row">
        <aside class="d-none d-sm-none d-md-block col-md-3 col-lg-3">
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur autem dolorum eum facere id,
                laboriosam minus molestiae sed vero! Cupiditate exercitationem, laborum omnis placeat quas qui
                ratione
                vel. Quae, sint.
            </div>
            <div>Accusantium aut consequuntur dolore dolores nulla odio qui quis totam vitae voluptatem. Beatae
                culpa
                dicta molestiae repellendus rerum! Ad asperiores autem beatae consequuntur exercitationem facere
                iste,
                laboriosam nobis sequi voluptates?
            </div>
            <div>Accusantium animi aut beatae corporis deserunt dignissimos dolor eius eos exercitationem explicabo
                impedit ipsum libero magnam mollitia nulla numquam odit, optio perferendis quae quaerat quibusdam
                reiciendis rerum sapiente suscipit, tempore.
            </div>
            <div>A aliquam cumque ex exercitationem facere fuga harum hic impedit, laudantium, magnam minima nobis
                possimus quam sapiente totam ullam voluptatem voluptates. Cupiditate distinctio dolor impedit,
                magnam
                tempore tenetur vero voluptates?
            </div>
            <div>A accusantium cumque dignissimos est ex, id itaque maiores neque nobis officia possimus unde.
                Adipisci
                consequuntur dignissimos, fugiat ipsum maiores mollitia nam numquam! Adipisci earum explicabo,
                itaque
                numquam quibusdam ut!
            </div>


        </aside>
        <section class="col-md-9 col-lg-9" >
            <?php if ($user = $session->isUserAuthenticated()) {
                var_dump($user);
            }else{
                echo 'persone de co';
            }
                ?>

        </section>
    </div>
</div>


