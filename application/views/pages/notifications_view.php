<section class="content">
    <div class="container-fluid">
        <!-- Table List Students -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="my_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Administrator Name</th>
                                    <th>Message</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $result_notifications = $this->model->MOD_GET_NOTIFICATIONS_DATA($this->session->userdata("primary_key")); ?>
                                <?php foreach ($result_notifications as $notification) : ?>
                                    <?php
                                    $unread = "";

                                    if ($notification->status == "unread") {
                                        $unread = "text-bold";
                                    }

                                    $message = $notification->message;

                                    if (strlen($message) > 100) {
                                        $message = substr($message, 0, 100) . " ...";
                                    }

                                    $date_and_time = $notification->date . " - " . $notification->time;

                                    $result_admin = $this->model->MOD_GET_USERACCOUNT_DATA($notification->admin_primary_key);
                                    ?>
                                    <tr class="<?= $unread ?> notifications_tr">
                                        <td><?= $notification->date ?></td>
                                        <td><?= $notification->time ?></td>
                                        <td><?= $result_admin[0]->name ?></td>
                                        <td><?= $message ?></td>
                                        <td class="text-center">
                                            <a href="#" class="notifications" data-toggle="modal" data-target="#view_notification" notification_id="<?= $notification->primary_key ?>" notification_message="<?= $notification->message ?>" notification_date_and_time="<?= $date_and_time ?>" notification_time="<?= $notification->time ?>" notification_admin="<?= $result_admin[0]->name ?>">
                                                <i class="fas fa-eye"></i>&nbsp;
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>