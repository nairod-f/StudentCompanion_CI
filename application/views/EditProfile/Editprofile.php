<main id="edit-profile-page">

        <?=form_open($formdata['action'], $formdata['attributes']); ?>

            <h3> Edit Profile</h3>

        <?php
            foreach ($form as $value):
        ?>
                    <div class="input-spaces">
                        <?=form_input($value);?>
                    </div>
        <?php
            endforeach;
        ?>
                            <div class="flex-box">
                                <div class="flex-space"></div>
                                <button type="submit">update</button>
                            </div>

                        <?=form_close();?>
        </form>
