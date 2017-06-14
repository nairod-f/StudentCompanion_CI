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

            <div class="radio-button">
                <h2>Gender:</h2>
          <ul>
              <li>
                <input type="radio" id="f-option" name="selector">
                <label for="f-option">Male</label>

                    <div class="check">
                        <div class="inside">
                        </div>
                    </div>
              </li>

              <li>
                <input type="radio" id="s-option" name="selector">
                    <label for="s-option">Female</label>
                        <div class="check">
                            <div class="inside">
                            </div>
                        </div>
              </li>

              <li>
                <input type="radio" id="t-option" name="selector">
                <label for="t-option">Other</label>

                <div class="check">
                        <div class="inside">
                        </div>
                    </div>
              </li>
        </ul>
        </div>

         <div class="flex-box">
                <div class="flex-space"></div>
                <button class="done-btn"type="submit">Save</button>
            </div>
        </form>
