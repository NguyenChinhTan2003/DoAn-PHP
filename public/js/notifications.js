document.addEventListener("DOMContentLoaded", function() {
    const notificationButton = document.getElementById('notification-btn');
    const notificationCount = document.getElementById('notification-count');
    const notificationList = document.getElementById('notification-list');
    const markAsReadBtn = document.getElementById('mark-as-read-btn');
    
    // Hàm lấy thông báo từ server
    function fetchNotifications() {
        fetch('index.php?controller=notification&action=fetch')
            .then(response => response.json())
            .then(notifications => {
                notificationList.innerHTML = ''; // Clear cũ
                notificationCount.textContent = notifications.length;
if (notifications.length === 0) {
                    const emptyItem = document.createElement('div');
                    emptyItem.textContent = 'Không có thông báo mới.';
                    notificationList.appendChild(emptyItem);
                    return;
                }

                notifications.forEach(notification => {
                    const notificationItem = document.createElement('div');
                    notificationItem.classList.add('notification-item');
                    notificationItem.textContent = notification.message;
notificationList.appendChild(notificationItem);
                });
            })
            .catch(error => {
                console.error('Lỗi khi lấy thông báo:', error);
            });
    }

    // Gọi hàm lấy thông báo khi trang load
    fetchNotifications();
// Toggle hiển thị danh sách khi bấm chuông
    notificationButton.addEventListener('click', () => {
        notificationList.style.display = notificationList.style.display === 'none' ? 'block' : 'none';
    });

    // Đánh dấu tất cả là đã đọc
    markAsReadBtn.addEventListener('click', () => {
        fetch('index.php?controller=notification&action=markAsRead', {
            method: 'POST'
})
            .then(response => response.text())
            .then(() => {
                fetchNotifications(); // load lại thông báo
                notificationCount.textContent = '0'; // reset count
            })
            .catch(error => {
                console.error('Lỗi khi đánh dấu đã đọc:', error);
            });
});
});


// --- Xử lý bình luận AJAX ---
function toggleCommentForm() {
    const form = document.getElementById('commentForm');
    form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
}

document.getElementById('commentFormInner').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
fetch('index.php?controller=community&action=addComment', {
        method: 'POST',
        body: formData,
    })
        .then(res => res.text())
        .then(data => {
            alert('✅ Đã gửi bình luận!');
            document.getElementById('commentForm').style.display = 'none';
        })
        .catch(err => {
            alert('❌ Có lỗi xảy ra');
            console.error(err);
});
});