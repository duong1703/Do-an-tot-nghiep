<form id="commentForm" action="/sendreviews" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"/>
    <span>
        <input value="<?php echo old('name'); ?>" id="name" name="name" type="text" placeholder="Your Name"/>
        <input value="<?php echo old('email'); ?>" id="email" name="email" type="email" placeholder="Email Address"/>
    </span>
    <textarea name="content" id="content"></textarea>
    <b>Đánh giá: </b>
    <div class="rating">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
    </div>

    <button type="submit" class="btn btn-default pull-right">Gửi đánh giá</button>
</form>
