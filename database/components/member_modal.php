<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">新增</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="addMemberForm" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">使用者名稱</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">電子信箱</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">電話號碼</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                        </div>
                        <div class="mb-3">
                            <label for="member_name" class="form-label">真實姓名</label>
                            <input type="text" class="form-control" id="member_name" name="member_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">地址</label>
                            <textarea class="form-control" name="location" id="location" cols="30" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">上傳頭像</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" required>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">生日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">性別</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                <label class="form-check-label" for="male">男</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="female">女</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
                                <label class="form-check-label" for="other">其他</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">添加會員</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
