# Quantasy 2020 Web Template

### Vagrant box info

1. Ubuntu 14.04.5 LTS, Apache, PHP v7.0, Python v2.7

### Setup

1. Clone repository - in your project directory, run - `git clone git@github.com:Quantasy/project-template-web-2.0.git`

### Init Vagrant box

1. Go to project root
2. run `vagrant up`
3. go to `http://192.168.33.10`

### Compiling css

1. In project root, run the sh file, `bash sass.sh` - this will automatically run the command to compile/watch your sass files.

<br /><br />

# Project Structure

### General text editor rules

-   4 space indentation
-   100 character line limit

### Creating a new component/page

-   copy `_template` directory, rename to component name
-   add local sass file to `/main.scss`
-   add local js file to `/js/main.js`
-   (this step not needed for component, only new page) Add page route to `/index.php`

### Assets

All assets are contained inside of `/assets/`<br />
Place all local fonts and images inside of this directory.

### Css / Sass

```
    file structure
        /[component]
            /styles
                desktop.scss
                tablet.scss
                mobile.scss
                init.scss
```

We use the breakpoint technique using media queries separated in individual files.<br />
The goal is to seperate each page/component style in smaller, easily readable snippets.<br />
Global styling used in multiple components should be kept in `/styles/global/`<br />
Fonts mixins are located in `/styles/global/fonts.scss`<br />
Use "desktop" for default styling, then override with tablet & mobile

### Html

Page markup will go into `/views/pages/[page]/view.php`<br />
Styling for page should go in `/views/pages/[page]/styles/`

```
    file structure
        /[component]
            /styles
            model.php
            view.php
```

### Javascript

We're using head.js to include modularized javascript files depending on the page.<br />
Each component has it's own JS file.<br />

```
    file structure
        /[component]
            /js
            local.js
```

Include your local component/page inside of `/js/main.js`<br />
Global JS shared with multiple components, should go here `/js/global/global.js`

### PHP

All backend data and logic should be called inside of `model.php`, this automatically gets passed into `view.php`<br />
Common php functions, API, and DB connections are all inside of the `/includes` directory.

### How to include your component to a page

\$data is the data being passed into your component<br />
You can also pass an empty array if no data is required `[]`

```
includeFile('views/components/hero/view.php', [$data]);
```

\$data should be called from model, do NOT do logic inside of `view.php` <br />
`$data = $Model->getDataFromModelClass()`

<br /><br />

# Plugins / Libraries

1. Jquery

<br /><br />

# Branching strategy

#### Always create branches off `master` branch

1. name branch using Jira ticket number.<br />
    - ex: `git checkout -b [ticket#]`
2. merge ticket branch into `dev` <br />
    - ex: `git checkout dev` && `git merge [branchName]`
3. after branch is confirmed and passes QA, it can be merged into `staging` branch<br />
    - ex: `git checkout staging` && `git merge [branchName]`
4. when ticket is confirmed and passes QA on staging, all of `staging` has to be merged into `master`<br />
    - `staging` should always be a replica of `master`.
    - Never merge individual tickets into `master`.
