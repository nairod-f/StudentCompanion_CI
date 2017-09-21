<main id="app-content">
    <div id="two-cols-documents">
        <div id="documents">
            <header>
                Documents
            </header>

                <div id="list_note">
                <?php foreach ($user_notes->result_array () as $item): ?>
                    <hr>
                        <a href="<?=site_url("notes/view/{$item['note_id']}")?>">
                        <span><?=$item['note_title']?></span>
                        <span><?=date ('d M Y, H:i', $item['note_date'])?></span>
                        </a>
                    <hr>
                <?php endforeach; ?>
                </div>
            </div>

        <hr>

        <div id="document-open">

            <?=form_open('notes/do_add_note', NULL, $form['hidden'])?>
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
