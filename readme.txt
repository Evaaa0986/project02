URL 分解說明

http://localhost:80/mfee56-php/address-book/index_.php?page=1

http 通訊協定
  localhost 主機
    :80 通訊埠
    /mfee56-php/address-book/index_.php 路徑加檔名, 拜訪的資源
      ?page=1 查詢字串參數 (Query String Parameters)
        #hash 頁面內的連結

=======================================
購物車 以 CRUD 的角度開始想

購物車 
  create: 新增購物車項目
    cart_id, member_id, product_id, quantity, created_at

  read: 購物車的內容

  update: 變更的項目的數量
  
  delete: 移除購物車裡的項目, 清空