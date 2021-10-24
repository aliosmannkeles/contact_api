<!DOCTYPE html>
<html>
<head>
    <title>İletişim formu dolduruldu.</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 75%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<p>Merhaba,</p>
<p>Aşağıdaki bilgilere sahip kişi sizinle iletişime geçti :</p>

<table>
    <tr>
        <td>Ad</td>
        <td>{{ $entity->first_name }}</td>
    </tr>
    <tr>
        <td>Soyad</td>
        <td>{{ $entity->last_name }}</td>
    </tr>
    <tr>
        <td>Telefon</td>
        <td>{{ $entity->phone }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ $entity->email }}</td>
    </tr>
    <tr>
        <td>Mesaj</td>
        <td>{{ $entity->message }}</td>
    </tr>
</table>

</body>
</html>