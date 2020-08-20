    </div>
    <!-- end of container-fluid -->
    <footer>
        <div class="row container m-auto">
            <div class="col-12 col-md-4">
                <h4>Menu</h4>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item<?php if (is_front_page()) echo ' active'; ?>">
                        <a class="nav-link" href="<?php echo site_url(''); ?>">O nás</a>
                    </li>
                    <li class="nav-item<?php if (is_page('nase-aktivity')) echo ' active'; ?>">
                        <a class="nav-link" href="<?php echo site_url('/nase-aktivity'); ?>">Aktivity</a>
                    </li>
                    <li class="nav-item<?php if (is_page('nase-sluzby')) echo ' active'; ?>">
                        <a class="nav-link" href="<?php echo site_url('/nase-sluzby'); ?>">Služby</a>
                    </li>
                    <li class="nav-item<?php if (is_page('pestounska-pece')) echo ' active'; ?>">
                        <a class="nav-link" href="<?php echo site_url('/pestounska-pece'); ?>">Pěstounská péče</a>
                    </li>
                    <li class="nav-item<?php if (is_page('dokumenty')) echo ' active'; ?>">
                        <a class="nav-link" href="<?php echo site_url('/dokumenty'); ?>">Dokumenty</a>
                    </li>
                    <li class="nav-item<?php if (is_page('podporuji-nas')) echo ' active'; ?>">
                        <a class="nav-link" href="<?php echo site_url('/podporuji-nas'); ?>">Podporují nás</a>
                    </li>
                    <li class="nav-item<?php if (is_page('kontakt')) echo ' active'; ?>">
                        <a class="nav-link" href="<?php echo site_url('/kontakt'); ?>">Kontakt</a>
                    </li>
               </ul>
            </div>
            <div class="col-12 col-md-4">
                <h4>Adresa</h4>
                <ul>
                    <li>
                        Provozovna:<br>
                        <i class="fas fa-map-marker-alt"></i> Volyňskych Čechů 326, 438 01 Žatec
                        <iframe src="https://api.mapy.cz/frame?params=%7B%22x%22%3A13.54433798221835%2C%22y%22%3A50.325440338766875%2C%22base%22%3A%221%22%2C%22layers%22%3A%5B%5D%2C%22zoom%22%3A17%2C%22url%22%3A%22https%3A%2F%2Fmapy.cz%2Fs%2F3u2M1%22%2C%22mark%22%3A%7B%22x%22%3A%2213.54433798221835%22%2C%22y%22%3A%2250.325440338766875%22%2C%22title%22%3A%22ulice%20Voly%C5%88sk%C3%BDch%20%C4%8Cech%C5%AF%20326%2C%20%C5%BDatec%22%7D%2C%22overview%22%3Afalse%7D&amp;width=400&amp;height=80&amp;lang=cs" width="400" height="80" style="border:none" frameBorder="0"></iframe>
                    </li>
                    <li>
                        Poradna:<br>
                        <i class="fas fa-map-marker-alt"></i> Husova 796, 438 01 Žatec (poliklinika, 2. patro)
                        <iframe src="https://api.mapy.cz/frame?params=%7B%22x%22%3A13.537982242704683%2C%22y%22%3A50.319543933875195%2C%22base%22%3A%221%22%2C%22layers%22%3A%5B%5D%2C%22zoom%22%3A17%2C%22url%22%3A%22https%3A%2F%2Fmapy.cz%2Fs%2F3u2MH%22%2C%22mark%22%3A%7B%22x%22%3A%2213.537982242704683%22%2C%22y%22%3A%2250.319543933875195%22%2C%22title%22%3A%22ulice%20Husova%202796%2C%20%C5%BDatec%22%7D%2C%22overview%22%3Afalse%7D&amp;width=400&amp;height=80&amp;lang=cs" width="400" height="80" style="border:none" frameBorder="0"></iframe>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-4">
                <h4>Kontakt</h4>
                <ul>
                    <li>
                        <address>
                            <i class="fas fa-map-marker-alt"></i> Sociální centrum pro rodinu, z.ú.<br>
                            Zelená 218, 439 49 Staňkovice
                        </address>
                    </li>
                    <li>
                        <a href="tel:+420602943155"><i class="fas fa-phone"></i> +420602943155</a>
                    </li>
                    <li>
                        <a href="mailto:scprorodinu@gmail.com"><i class="far fa-envelope"></i> scprorodinu@gmail.com</a>
                    </li>
                    <li><a target="blank" href="https://www.facebook.com/scprorodinu/?__tn__=%2Cd%2CP-R&eid=ARCQwzuGC8mXkugv9Vjp5mL57PT1vtwzaa76dIHCbjmH4_dmpQy1adQxKI7mrK6ywAs73aZYpKfvHRCj"><i class="fab fa-facebook-square"></i> Sociální centrum pro rodinu na Facebooku</a></li>
                    <li><i class="fas fa-user"></i> IČ: 063 55 480</li>
                    <li><i class="fas fa-money-check"></i> č.ú. 115-5036440297/0100</li>
                </ul>
            </div>

            <div class="col-12 text-center created">
                <a href="https://filipurban.cz/" target="blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo_small.png" alt="Filip Urban Webdesign">
                </a>
                <small>Copyright &copy; Sociální centrum pro rodinu</small>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
