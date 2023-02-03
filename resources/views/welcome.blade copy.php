<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <!-- แทนที่ "ทดสอบ" ด้วยรหัสไคลเอนต์แอปบัญชีธุรกิจแซนด์บ็อกซ์ของคุณเอง -->
  <script src="https://www.paypal.com/sdk/js?client-id=test&currency=THB"></script>
  <!-- <script src="https://www.paypal.com/sdk/js?client-id=AR-2BX4D8KDdqnuBCy7LH6U-igfbPZT3VVS4F3t60zlqCsIkBpksrPLxAsnr7dRu5On9HVxBB96SGWIF&currency=THB"></script> -->
  <!-- ตั้งค่าองค์ประกอบคอนเทนเนอร์สำหรับปุ่ม -->
  <div id="paypal-button-container"></div>
  <script>
    paypal.Buttons({
      // ตั้งค่าธุรกรรมเมื่อคลิกปุ่มชำระเงิน
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '1' // อ้างอิงตัวแปรหรือฟังก์ชันได้ด้วย
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // ทำธุรกรรมให้เสร็จสิ้นหลังจากผู้ชำระเงินอนุมัติ
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          // เมื่อพร้อมที่จะถ่ายทอดสด ให้ลบการแจ้งเตือนและแสดงข้อความแสดงความสำเร็จภายในหน้านี้ ตัวอย่างเช่น:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
        });
      }
    }).render('#paypal-button-container');
  </script>
</body>
</html>