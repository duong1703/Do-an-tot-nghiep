<div class="row dash-row ">
    <div class="col-xl-6 rounded-4 ">
        <div class="stats stats-primary shadow-lg p-3 mb-5 rounded-4">
            <h3 class="stats-title"> Tổng người dùng </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="stats-data">

                    <div class="stats-number"><?= $usercount ?></div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 rounded-4">
        <div class="stats stats-success shadow-lg p-3 mb-5 rounded-4 ">
            <h3 class="stats-title"> Số lượng sản phẩm</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-cube"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number"><?= $productcount ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 rounded-4">
        <div class="stats stats-warning shadow-lg p-3 mb-5 rounded-4 ">
            <h3 class="stats-title"> Số lượng bài viết</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number"><?= $blogcount ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="stats shadow-lg p-3 mb-5 rounded-4 ">
            <h3 class="stats-title"> Số lượng đơn hàng đã đặt</h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-cube"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number"></div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script>
/* date */
function updateDate() {
    var now = new Date();
    var options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    var formattedDate = now.toLocaleDateString('en-US', options);

    document.getElementById('realtime-date').innerHTML = formattedDate;
}

// Gọi hàm updateDate() mỗi giây để cập nhật ngày
setInterval(updateDate, 1000);

/* date */
function updateTime() {
    var now = new Date();
    var time = now.toLocaleTimeString();

    document.getElementById('realtime-time').innerHTML = time;
}

// Gọi hàm updateTime() mỗi giây để cập nhật thời gian
setInterval(updateTime, 1000);
</script>