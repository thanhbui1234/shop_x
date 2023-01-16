<?php normalUsers()?>
<?php adminUsers()?>
<?php showUsers()?>

<?php deleteUsers()?>

<table class="table table-bordered shadow  bg-body rounded  container ">

    <thead>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Tên đăng nhập</th>
            <th>SĐT</th>
            <th>Ảnh</th>
            <th>Vị trí</th>
            <th>Phân quyền</th>
            <th>Action</th>
        </tr>

    </thead>

    <tbody>

        <?php foreach ($users as $user) {?>
        <tr>
            <td><?php echo $user['user_id'] ?></td>
            <td><?php echo $user['user_fullName'] ?></td>
            <td><?php echo $user['user_email'] ?></td>
            <td><?php echo $user['user_name'] ?></td>
            <td><?php echo $user['phone'] ?></td>
            <td><img src="/uploads// <?php echo $user['user_img'] ?>" alt="<?php echo $user['user_name'] ?>"></td>
            <td><?php echo $user['user_role'] == 1 ? 'Người dùng' : 'Admin' ?></td>
            <td><a href="user.php?normalUser=<?php echo $user['user_id'] ?>">Người dùng</a>
                <a href="user.php?adminUser=<?php echo $user['user_id'] ?>">Admin</a>
            </td>
            <td><a href="user.php?deleteUser=<?php echo $user['user_id'] ?>"><button
                        class="btn btn-danger">Xóa</button></a></td>


        </tr>

        <?php }?>
    </tbody>
</table>