<?php if ( have_posts() ) while ( have_posts() ) : the_post(); $custom = get_post_custom($post->ID); ?>

<div id="content-header" class="right"> 
    <div class="title">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
    <div class="order_b">
        <div class="b"><a onclick="javascript:showElement('feedback_3'); hideElement('feedback_2'); hideElement('feedback_1'); hideElement('feedback_res');" href="#fb1">Сделать заказ</a></div>
    </div>
</div>

<div class="page-content">
    <?php if ( has_post_thumbnail() ): 
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
        $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), array(250,250));
    ?>
    <div class="product_thumb">
        <a href="<?php echo $large_image_url[0]; ?>" title="<?php echo get_the_title(); ?>">
            <img width="250" src="<?php echo $thumb_image_url[0]; ?>">
        </a>
    </div>
    <?php endif; ?>

    <?php the_content(); ?>

    <div style="clear:both;"></div>
    <div class="custom_content">

        <script type="text/javascript">
        <!--
        function viewdiv(n){
            var max=4;
            var cel=document.getElementById('c'+n);
            var tel=document.getElementById('t'+n);
           
            if(cel.style.display=="block"){
                cel.style.display="none";
                tel.removeAttribute("class");
            } else {
                cel.style.display="block";
                tel.className="active";

                for(i=1; i<=max; i++)                    
                    if(n != i) {                        
                        var e1=document.getElementById('c'+i);
                        var e2=document.getElementById('t'+i);
                        if (e1) { e1.style.display='none'; }                        
                        if (e2) { e2.removeAttribute("class"); }
                    }                    
                return;               
            }
        }
        //-->
        </script>

        <div class="tabs">
            <ul>
                <?php if ($custom['product_price'][0] != ""): ?>
                <li><div class="product_price"><?php echo number_format($custom['product_price'][0], 0,'',' '); ?><span>&nbsp;&#128;</span></div></li>
                <?php endif; ?>

                <?php if ($custom['product_bu'][0] != 0): ?>
                <li><div class="product_bu">б.у.</div></li>
                <?php endif; ?>

                <?php if ($custom['product_tech'][0] != ""): ?>
                <li id="t1"><a href="javascript:void(0);" onclick="viewdiv('1');">Технические параметры</a></li>
                <?php endif; ?>

                <?php if ($custom['product_video'][0] != ""): ?>
                <li id="t2"><a href="javascript:void(0);" onclick="viewdiv('2');">Видео работы</a></li>
                <?php endif; ?>

                <?php if ($custom['product_gallery'][0] != ""): ?>
                <li id="t3"><a href="javascript:void(0);" onclick="viewdiv('3');">Галлерея</a></li>
                <?php endif; ?>

                <?php if ($custom['product_docs'][0] != ""): ?>
                <li id="t4"><a href="javascript:void(0);" onclick="viewdiv('4');">Документы</a></li>
                <?php endif; ?>
            </ul>            
        </div>
        
        <?php if ($custom['product_tech'][0] != ""):
            $product_tech = $custom['product_tech'][0];
            $product_tech = str_replace(" ","",strip_tags($product_tech));
            $product_tech = explode(",",$product_tech);

            $tech = '';
            foreach($product_tech as $p){
                $n = intval($p);
                if ($n) $tech .= '<p><a href="'.wp_get_attachment_url($n).'" title="Увеличить изображение"><img src="'.wp_get_attachment_url($p).'" alt="Технические параметры '.get_the_title().'"></a></p>';
            }
        ?>
        <div id="c1" class="c" style="display:none;"><?php echo $tech; ?></div>
        <?php endif; ?>

        <?php if ($custom['product_video'][0] != ""): ?>
        <div id="c2" class="c" style="display:none;"><?php echo $custom['product_video'][0]; ?></div>
        <?php endif; ?>

        <?php if ($custom['product_gallery'][0] != ""):
            $product_gallery = $custom['product_gallery'][0];
            $product_gallery = str_replace(" ","",strip_tags($product_gallery));
            $product_gallery = explode(",",$product_gallery);

            $gallery = '';
            foreach($product_gallery as $p){
                $n = intval($p);
                if ($n) $gallery .= '<p><a href="'.wp_get_attachment_url($n).'" title="Увеличить изображение"><img src="'.wp_get_attachment_url($p).'" alt="'.get_the_title().'"></a></p>';
            }
        ?>
        <div id="c3" class="c" style="display:none;"><?php echo $gallery; ?></div>
        <?php endif; ?>

        <?php if ($custom['product_docs'][0] != ""):
            $product_docs = $custom['product_docs'][0];
            $product_docs = str_replace(" ","",strip_tags($product_docs));
            $product_docs = explode(",",$product_docs);            

            $docs = '';
            foreach($product_docs as $p){
                $n = intval($p);
                if ($n) {
                    $pArr = wp_get_attachment_metadata($n);
                    print_r($pArr);
                    $docs .= '<p><a href="'.wp_get_attachment_url($n).'" target="_blank" title="Скачать файл">'.get_the_title($n).'</a></p>';
                }
            }
        ?>
        <div id="c4" class="c" style="display:none;"><?php echo $docs; ?></div>
        <?php endif; ?>

    </div>
</div>

<?php endwhile; ?>