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
                                    <th>Transaction Event</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $result_transactions = $this->model->MOD_SINGLE_TRANSACTIONS_DATA($this->session->userdata("primary_key")); ?>
                                <?php foreach ($result_transactions as $transactions) : ?>
                                    <tr>
                                        <td><?= $transactions->date ?></td>
                                        <td><?= $transactions->time ?></td>
                                        <td><?= $transactions->event ?></td>
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