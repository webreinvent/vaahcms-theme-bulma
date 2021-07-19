# vaahcms-theme-bulmablogtheme
BulmaBlogTheme Theme for VaahCMS


## Steps to clone 

#### Step 1:
Clone the repository [Bulma Blog Theme](https://github.com/webreinvent/vaahcms-theme-bulma) at ``.../VaahCms/Themes/``.

#### Step 2:
While cloning Put that ``Repo`` name ``BulmaBlogTheme``  


#### To Run Theme Dusk Test:
- Change path of dusk in `phpunit.dusk.xml` to following:
```xml
<directory suffix="Test.php">./VaahCms/Themes/BulmaBlogTheme/Tests/Browser</directory>
```

- Then run `php artisan dusk`
