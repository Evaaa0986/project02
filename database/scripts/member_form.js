// 表單提交事件監聽
document.getElementById('addMemberForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('../api/members/members-add.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('會員添加成功');
                location.reload(); // 成功後重新加載頁面
            } else {
                alert('錯誤: ' + data.message);
            }
        })
        .catch(error => {
            console.error('錯誤:', error);
        });
});
