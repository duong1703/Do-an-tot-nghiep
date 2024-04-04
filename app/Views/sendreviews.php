<form id="commentForm" action="views/sendreviews" method="post">
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

<script>
    $(document).ready(function(){
        $('#commentForm').submit(function(e){
            e.preventDefault();

            var name = $('#name').val();
            var email = $('#email').val();
            var content = $('#content').val();
            var rating = $('.rating .star.active').length; // Lấy số sao đánh giá

            // Gửi dữ liệu form lên server bằng AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: {
                    name: name,
                    email: email,
                    content: content,
                    rating: rating,
                    '<?php echo csrf_token(); ?>': '<?php echo csrf_hash(); ?>'
                },
                success: function(response){
                    alert(response); // Hiển thị thông báo từ server (nếu có)
                    // Xóa dữ liệu trong form sau khi gửi thành công
                    $('#name').val('');
                    $('#email').val('');
                    $('#content').val('');
                    $('.rating .star').removeClass('active');
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText); // Hiển thị lỗi nếu có
                }
            });
        });

        // Xử lý sự kiện click cho đánh giá sao
        $('.rating .star').click(function(){
            $(this).addClass('active').prevAll().addClass('active');
            $(this).nextAll().removeClass('active');
        });
    });

</script>