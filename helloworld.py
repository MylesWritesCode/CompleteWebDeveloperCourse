#! /usr/bin/python

print 'Content-type: text/html'
print ''

age = 35
print age

pi = 3.14
print pi

name = "myles"
print name

print age / pi

# We can't multiply this number because it's stored as a string.
number = "5"
# Unless we cast it to an int
print int(number) * pi

string = "My name is "
# We can pull specific characters from a string, as an array
print string[0]
# Incidentally, this works as well
print string[0:5]

print string + name

myArray = ["Pizza", "Chicken", "Pasta", "Apples"]
print myArray
print myArray[1]

# The last item is exclusive, which means this prints Pizza and Chicken
print myArray[0:3]

# Tuples are read-only lists
myTuple = (1, 2, 3, 4)
print myTuple[2]

# Dictionaries are a useful way to define an array (or key + value)
dict = {}
dict["fruit"] = "Apples"
dict["poultry"] = "Chicken"
dict[1] = "Pizza"
dict[2] = "Pasta"
