dd -> dump and die
dump ->  Non-Terminating Dump
ddd -> dump die debug

interface repository

file naming

config ->   predifine config ->php artisan vendor:publish --tag=config

storage   ->

storage/app:
This directory is used to store files generated and managed by your application. For example, when users upload images or files, they might be stored in the storage/app directory.

storage/framework:
This directory contains temporary files and cache used by Laravel. For instance, Laravel uses the storage/framework/cache directory to store cached views and the storage/framework/sessions directory to store session files.

service provider
relation ship

dollar, custom name, extra export

Use belongsTo when the foreign key is on the current model's table, and it references the primary key of another model.
If you have a Comment model and each comment is associated with a single User, you would use belongsTo in the Comment model to establish this relationship.

Use hasMany when the foreign key is on the related model's table, and it references the primary key of the current model.
If you have a User model and each user can have multiple comments, you would use hasMany in the User model.

