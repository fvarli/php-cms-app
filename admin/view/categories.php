<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Categories
            <?php if (permission('categories', 'add')): ?>
                <a href="<?= admin_url('add_category') ?>">Add New</a>
            <?php endif; ?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Category Name</th>
                <th class="hide">Adding Date</th>
                <th>Process</th>
            </tr>
            </thead>
            <tbody class="table-sortable" data-table="categories" data-where="category_id" data-column="category_order">
            <?php foreach ($query as $row): ?>
                <tr id="id_<?=$row['category_id']?>">
                    <td>
                        <a href="<?= admin_url('edit_category?id=' . $row['category_id']) ?>" class="title">
                            <?= $row['category_name'] ?>
                        </a>
                    </td>
                    <td class="hide">
                        <?= timeConvert($row['category_date']) ?>
                    </td>
                    <td>
                        <?php if (permission('categories', 'edit')): ?>
                            <a href="<?= admin_url('edit_category?id=' . $row['category_id']) ?>" class="btn">Edit</a>
                        <?php endif; ?>
                        <?php if (permission('categories', 'delete')): ?>
                            <a onclick="return confirm('Are you sure?')"
                               href="<?= admin_url('delete?table=categories&column=category_id&id=' . $row['category_id']) ?>"
                               class="btn">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script language="JavaScript" type="text/javascript">

        function checkDelete() {
            return confirm('Are you sure?');
        }
    </script>


<?php require admin_view('static/footer') ?>