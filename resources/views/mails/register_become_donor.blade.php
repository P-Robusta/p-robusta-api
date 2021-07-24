<body>
  <p>Hi <b><i>{{$data['name']}}</i></b></p>

  <p>Thank you for being one of our sponsors and donors.</p>
  <p>Some your information to contact are:</p>
  <ul>
    <li>Phone nmber:<i> {{$data['phone']}}</i></li>
    <li>Email:<i> {{$data['email']}}</i></li>
    <li>Type your donation: <i> {{$data['selectedOption']}}</i></li>
  </ul>
  <p>This is your code to donate: <b><i>{{$data['code']}}</i></b></p>

  <p>Best regards,</p>
  <p>Passerelles numériques Vietnam</p>
</body>
