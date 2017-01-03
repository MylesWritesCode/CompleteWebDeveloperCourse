#! /usr/bin/python

print 'Content-type: text/html'
print ''

# GET and POST Variables
import cgi
import random
form = cgi.FieldStorage()

red = 0
white = 0

# use form.getvalue("key") to pull value from GET array
if "answer" in form:
    answer = form.getvalue("answer")
else:
    answer = ""
    for i in range (4):
        answer += str(random.randint(0, 9))

if "guess" in form:
    guess = form.getvalue("guess")
    for k, v in enumerate(guess):
        if v == answer[k]:
            red += 1
        else:
            for j in answer:
                if j == v:
                    white += 1
                    break
else:
    guess = ""

if "numGuess" in form:
    numGuess = int(form.getvalue("numGuess")) + 1
else:
    numGuess = 0

if red == 4:
    print "<h1>You Won!</h1>"

print '<h1>Mastermind</h1>'
print "<p>I've chosen a 4 digit number. Can you guess it?</p>"
print "<form method='POST'>"
print "<input type='text' name='guess' value ='" + guess + "'>"
print "<input type='hidden' name='answer' value='" + answer + "'>"
print "<input type='hidden' name='numGuess' value='" + str(numGuess) + "'>"
print "<input type='submit' value='Guess!'>"
print "</form>"
print "You have " + str(red) + " correct digits in the right place."
print "You have " + str(white) + " correct digits in the wrong place."
print "You've guessed " + str(numGuess) + " times"
