## Overview
Building upon skills learned from other web development courses (basic bootstrap, jQuery, and ruby) I'm going to be building a series of websites provided by this course. I'm going to be focusing more on the Python, PHP and SQL given in this course, since it's something I haven't tackled yet.

In addition to the new languages, I'd like to have more time and practice with jQuery and JS, because other classes I've taken on them have been more of a "copy what I code" lesson rather than applying critical thinking skills. As such, all of these projects were created without looking at the code supplied by the instructor, but cleaned up along with him.

## Demo websites
There are a couple of demo websites up that are hosted by Eco Web Hosting, as it comes with the Complete Web Developer Course (thanks Rob!). Here's a list of them. I'm most proud of the secret diary, since on that one I tackled it primarily myself without looking at any of the code Rob used before completing the video.


[Weather Scraper](http://176.32.230.7/cwdcmyles.com/WeatherScraper/)
[Secret Diary](http://176.32.230.7/cwdcmyles.com/secret/diary/)
[Twitter Clone](http://176.32.230.7/cwdcmyles.com/TwitterClone/)


## Merging of all Repositories
I've created a bunch of repositories to follow my work throughout this course, but feel that it's getting ridiculous to have multiple repos for the same class. I merged them by creating a new repo and adding remotes, then merging them and committing them to master. So that I don't have to look around if I need to do this again, the following code is needed to compile many repositories into a single repo.

First create the new repository and add an initial commit:
```
cd ..
mkdir newFolder
git init
touch README.md
git commit -m "Initial commit"
```
Then for each of the old repositories, commit the following while in the newFolder:
```
git remote add -f oldRepoName git@github.com:OldRepoName.git
git merge -s ours --no-commit --allow-unrelated-histories oldRepoName/master
git read-tree --prefix=SubdirectoryYouWant/ -u oldRepoName/master
git commit -m "Merging OldRepoName into master"
```
Finally, it's okay to delete the old repositories and you'll still have the same history with your new repo (as evidenced in this one).

## Twitter Clone
The Twitter clone doesn't look like much, but it was my first attempt at MVC without a framework like Rails. I enjoy Rails so much more than doing it from scratch like I did with this Twitter clone. I will admit though, once the ball got rolling, it got rolling fast. There are definitely some optimizations that I would need to explore should this become a production website, such as making sure that I'm only calling the db if I need the db, refactoring the PHP (this is something I feel needs to be done) and fixing the layout. If I had to tackle this assignment again, I would definitely try to use a preset framework such as CakePHP or Laravel so that I can spend more time making the website look nicer and use best practices with the backend code.

## Course Reflection
Overall I think that this course was good for me. Some sections (ie. Bootstrap, Mobile Apps, WordPress and APIs) weren't as informational. The PHP, JS, jQuery, and SQL sections were extremely helpful and I feel that I have a good grasp of the languages. I wish the course focused more on the workflow of a web developer, and feel that the less informational sections could be substituted with sections such as "How to Plan A Website" or "Best Practice Techniques for Web Developers." For now I'm leaving this repo as finished seeing as I want to learn more about backend coding (and because I think I have a grasp of front end coding). I'm going to first spend my time with another course on Ruby on Rails, then Angular 2 with a Rails backend, then possibly Go and C# with Unity.
