# Comandos del curso de filament

En este caso se utiliza sail para ejecutar los comandos de artisan, por el ambiente de docker.

## Crear el resource de Categoria
```bash
sail artisan make:filament-resource Category

No

No

```

## Crear el resource de Level
```bash
sail artisan make:filament-resource Level

No

No

```

## Crear el resource de Tags
```bash
sail artisan make:filament-resource Tag

No

No

```

## Crear el resource de Course
```bash
sail artisan make:filament-resource Course

No

No

```

## Crear el resource de Module
```bash
sail artisan make:filament-resource Module --nested

 The "title attribute" is used to label each record in the UI.

 You can leave this blank if records do not have a title.

 ┌ What is the title attribute for this model? ─────────────────┐
 │ title                                                        │
 └──────────────────────────────────────────────────────────────┘

 ┌ Which resource would you like to nest this resource inside? ─┐
 │ Courses                                                      │
 └──────────────────────────────────────────────────────────────┘

 ┌ Would you like to generate a read-only view page for the resource? ┐
 │ No                                                                 │
 └────────────────────────────────────────────────────────────────────┘

 ┌ Should the configuration be generated from the current database columns? ┐
 │ No                                                                       │
 └──────────────────────────────────────────────────────────────────────────┘

   INFO  Filament resource [App\Filament\Resources\Courses\Resources\Modules\ModuleResource] created successfully.

```

## Crear el resource de Lesson
```bash
 sail artisan make:filament-resource Lesson --nested

 The "title attribute" is used to label each record in the UI.

 You can leave this blank if records do not have a title.

 ┌ What is the title attribute for this model? ─────────────────┐
 │ title                                                        │
 └──────────────────────────────────────────────────────────────┘

 ┌ Which resource would you like to nest this resource inside? ─┐
 │ Courses\Resources\Modules                                    │
 └──────────────────────────────────────────────────────────────┘

 ┌ Would you like to generate a read-only view page for the resource? ┐
 │ No                                                                 │
 └────────────────────────────────────────────────────────────────────┘

 ┌ Should the configuration be generated from the current database columns? ┐
 │ No                                                                       │
 └──────────────────────────────────────────────────────────────────────────┘

   INFO  Filament resource [App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\LessonResource] created successfully.

```

## Relacion para cursos y modulos
```bash
sail artisan make:filament-relation-manager CourseResource modules title

 Linking to an existing resource will open the resource's pages instead of modals when links are clicked. It will also inherit the resource's configuration.

 ┌ Do you want to link this to an existing resource? ───────────┐
 │ Yes                                                          │
 └──────────────────────────────────────────────────────────────┘

 ┌ Which resource do you want to use? ──────────────────────────┐
 │ Courses\Resources\Modules                                    │
 └──────────────────────────────────────────────────────────────┘

   INFO  Filament relation manager [App\Filament\Resources\Courses\RelationManagers\ModulesRelationManager] created successfully.

   INFO  Make sure to register the relation in [App\Filament\Resources\Courses\CourseResource::getRelations()].
```


## Relacion para Modulo y lesiones
```bash
sail artisan make:filament-relation-manager ModuleResource title

 ┌ Which resource would you like to create this relation manager in? ┐
 │ Courses\Resources\Modules                                         │
 └───────────────────────────────────────────────────────────────────┘

 Linking to an existing resource will open the resource's pages instead of modals when links are clicked. It will also inherit the resource's configuration.

 ┌ Do you want to link this to an existing resource? ───────────┐
 │ Yes                                                          │
 └──────────────────────────────────────────────────────────────┘

 ┌ Which resource do you want to use? ──────────────────────────┐
 │ Courses\Resources\Modules\Resources\Lessons                  │
 └──────────────────────────────────────────────────────────────┘

   INFO  Filament relation manager [App\Filament\Resources\Courses\Resources\Modules\RelationManagers\TitleRelationManager] created successfully.

   INFO  Make sure to register the relation in [App\Filament\Resources\Courses\Resources\Modules\ModuleResource::getRelations()].
```
