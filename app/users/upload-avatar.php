<?php

declare(strict_types=1);

if (isset($_FILES['avatar'])) {
    move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '../../uploads');
}
