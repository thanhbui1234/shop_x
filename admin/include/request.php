<table class="table table-bordered shadow  bg-body rounded  container ">
    <?php request()?>

    <?php accept()?>

    <?php deleteRequest()?>

    <thead>
        <tr>
            <th>ID yêu cầu</th>
            <th>ID người gửi </th>
            <th>Lý do</th>
            <th>Ngày gửi</th>
            <th>Action</th>
        </tr>

    </thead>

    <tbody>

        <?php foreach ($dataRequests as $request) {?>
        <tr>
            <td><?php echo $request['id'] ?></td>
            <td><?php echo $request['user_id'] ?></td>
            <td class="reason"><?php echo $request['reason'] ?></td>
            <td><?php echo $request['date_request'] ?></td>
            <td>
                <a href="user.php?user=request&&accept=<?php echo $request['user_id'] ?>&&id=<?php echo $request['id'] ?>
                "> <button class="btn btn-success">Chấp nhận</button></a>
                <a href="user.php?user=request&cancel=<?php echo $request['id'] ?>

"><button class="btn btn-danger">Hủy</button></a>
            </td>
        </tr>
        <?php }?>


    </tbody>
</table>