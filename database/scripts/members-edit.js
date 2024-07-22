// 取得表單元素
const {
  user_name: name_f,
  email: email_f,
  mobile: mobile_f,
} = document.form1;

// 驗證 Email 格式的函數
function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

// 驗證手機號碼格式的函數
function validateMobile(mobile) {
  const re = /^09\d{2}-?\d{3}-?\d{3}$/;
  return re.test(mobile);
}

// 表單提交事件處理函數
const sendForm = e => {
  e.preventDefault(); // 阻止表單默認提交行為

  // 重置表單元素的樣式和錯誤信息
  resetFormStyles();

  // 表單驗證標誌
  let isPass = true;

  // 驗證姓名是否填寫正確
  if (name_f.value.length < 2) {
    isPass = false;
    setError(name_f, "請填寫正確的姓名");
  }

  // 驗證 Email 格式是否正確
  if (email_f.value && !validateEmail(email_f.value)) {
    isPass = false;
    setError(email_f, "請填寫正確的 Email");
  }

  // 驗證手機號碼格式是否正確
  if (mobile_f.value && !validateMobile(mobile_f.value)) {
    isPass = false;
    setError(mobile_f, "請填寫正確的手機號碼");
  }

  // 如果表單通過驗證
  if (isPass) {
    submitForm();
  }
}

// 重置表單樣式和錯誤信息
function resetFormStyles() {
  const fields = [name_f, email_f, mobile_f];
  fields.forEach(field => {
    field.style.border = '1px solid #CCC';
    field.nextElementSibling.innerHTML = "";
  });
}

// 設置表單錯誤樣式和訊息
function setError(field, message) {
  field.style.border = '1px solid red';
  field.nextElementSibling.innerHTML = message;
}

// 提交表單數據到服務器
function submitForm() {
  // 創建 FormData 對象
  const fd = new FormData(document.form1);

  // 發送表單數據到服務器
  fetch('members-add.php', {
    method: 'POST',
    body: fd, // content-type: multipart/form-data
  }).then(r => r.json())
    .then(result => {
      console.log({ result });
      if (result.success) {
        myModal.show(); // 顯示成功模態框
      }
    })
    .catch(ex => console.log(ex))
}

// 初始化 Bootstrap 模態框
const myModal = new bootstrap.Modal(document.getElementById('exampleModal'))