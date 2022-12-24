symfony new symfony-hexagonal
cd symfony-hexagonal
composer require --dev symfony/maker-bundle
composer require symfony/orm-pack

Configurar bd en .env

php bin/console doctrine:database:create
php bin/console doctrine:schema:create

Un poco de teoria Hexagonal

Ahora vamos con la Arquitectura Hexagonal
Hay mucha bibliografía sobre Arquitectura Hexagonal por Internet. Así que, parafraseando un poco, tenemos hasta ahora un software estructurado por capas que no es hexagonal.

Tenemos de momento sólo estas capas: controladores, entidades y repositorios. Pero en la Arquitectura Hexagonal, tenemos que tener otra estructura con las siguientes capas:

Dominio:
Esta es la capa más interna. Aquí va todo el código genérico con los objetos que manejan conceptualmente todo. Por ejemplo, para este post tenemos una aplicación orientada a manejar tareas, podríamos poner aquí los conceptos de las tareas, prioridades, personas, asignaciones, etc.. todo lo relacionado con lo especial a nivel conceptual. Es decir, aquí va todo lo relacionado con el modelo del dominio.
Aplicación:
Aquí van todos los casos de uso que hacen que se conecten las capas de infraestructura con el dominio. Por ejemplo, unos casos de uso para una aplicación de gestión de tareas podrían ser AñadirTarea(X), AñadirPersona(Y), ObtenerTodasLasTareasPendientesDeAsignacion(), ObtenerLasTareasAsignadasAUnaPersona(Y), AsignarTareaAPersona(X, Y), etc.. Es decir, aquí van todos los casos de uso que dan externamente funcionalidades a la aplicación.
Infraestructura:
Aquí finalmente tenemos los puntos de entrada y salida para toda la aplicación. Por ejemplo en este caso para el post, el contacto con el exterior será por HTTP y un BD SQLite: una API (ApiController.php) para obtener las tareas bajo ruta /api, otro endpoint (DefaultController.php) para generar tareas aleatoriamente bajo ruta /default, y un adaptador a Base de Datos (TaskRepository.php) para la persistencia.
Lo bueno de esta arquitectura es que las capas más internas (dominio y aplicación), no saben nada del exterior, son independientes. Así de esta forma el programa será mucho más mantenible, robusto, modificable, etc..

Por ejemplo, si cambiamos la forma de almacenamiento de SQL a NoSQL, sólo habría que cambiar la capa de infraestructura, no se verían afectadas las otras capas de dominio y aplicación. Igualmente si ahora queremos una web, una app, mensajes en chats o email.. solo tocaríamos infraestructura.

Igualmente si modificamos la capa de dominio o aplicación, los comportamientos internos, no harían falta cambios en las capa externa de infraestructura.