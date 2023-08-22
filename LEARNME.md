# Installing Symfony CLI

```bash
$ wget https://get.symfony.com/cli/installer -O - | bash
$ symfony check:requirements
$ symfony new symfonium.edu --full
# It is important to set execute mode
# for the web server system user (for apache: www-data)
# on all project public files (public and var directories).
$ composer require apache-pack
$ composer install
```

# Creating a page

- Create a controller `src/Controller/LuckyNumberController.php`.

```php
<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyNumberController
{
    #[Route('/drawn-lucky-number')]
    public function drawnNumber(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }
}

```

Run `http://symfonium.edu.local/lucky-number/` for the results.

- Install **Twig** via Composer: `composer require twig`.

- Create **template file** `templates/personal_lucky_number.html.twig`.

```html
<div style="font-size: 60px;">Your lucky number is {{ number }}</div>

```

- Make `LuckyNumberController` extending `AbstractController`.

- Add new action to the `LuckyNumberController`.

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyNumberController extends AbstractController
{
    #[Route('/drawn-lucky-number')]
    public function drawnNumber(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

    #[Route('/personal-lucky-number/{name}')]
    public function personalNumber(string $name): Response
    {
      $keyNumber = strlen($name);
      $number = random_int($keyNumber, 100 + $keyNumber);

      return $this->render('personal_lucky_number.html.twig', ['number' => $number]);
    }
}

```

- Run `http://symfonium.edu.local/personal-lucky-number/somename` for the results.

# Routing configuration

- Create a controller `src/Controller/BlogController.php`.

```php
<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController
{
  #[Route('/blog')]
  public function posts(): Response
  {
    return new Response("<h1>Hello, there!</h1>");
  }
}

```
