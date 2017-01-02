Building upon skills learned from other web development courses (basic bootstrap, jquery, and ruby) I'm going to be building a series of websites provided by this course. I'm going to be focusing more on the Python, PHP and SQL given in this course, since it's something I haven't tackled yet.

In addition to the new languages, I'd like to have more time and practice with jQuery and JS, because other classes I've taken on them have been more of a "copy what I code" lesson rather than applying critical thinking skills. As such, all of these projects were created without looking at the code supplied by the instructor, but cleaned up along with him.

## Merging of all Repositories
I've created a bunch of repositories to follow my work throughout this course, but feel that it's getting ridiculous to have multiple repos for the same class. I merge them by creating a new repo and adding remotes, then merging them and committing them to master. So that I don't have to look around if I need to do this again, the following code is needed to compile many repositories into a single repo.

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
