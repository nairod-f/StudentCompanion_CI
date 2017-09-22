<main id="app-content">
    <div id="two-cols-documents">
    <div id="documents">
        <header>
            To Do List -
        </header>

            <div id="todo_list">
            <?php foreach ($user_todo->result_array () as $item): ?>
                <hr>
                    <a href="<?=site_url("view_todo/{$item['todo_list_id']}")?>">
                    <span><?=$item['todo_title']?></span>
                    <span><?=date ('d M Y, H:i', $item['todo_date'])?></span>
                    </a>
                <hr>
            <?php endforeach; ?>
            </div>
        </div>

    <hr>

    <div id="document-open">

        <?=form_open('todo/do_add_todo'), NULL, $form['hidden'])?>
        <header>
                <?=form_input($form['title'])?>
        </header>
        <li>
            <?=form_textarea($form['content'])?>
                <br>
                <button type="submit">Save</button>
        </li>
        <?=form_close()?>


    </div>
</div>
</main>
