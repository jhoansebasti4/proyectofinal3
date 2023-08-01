# Instrucciones

Bienvenido al proyecto final del nivel 3. En este proyecto estaremos aplicando los conocimientos adquiridos a lo largo del nivel. Sigue las instrucciones de este archivo para completar el proyecto y ten en cuenta que estas mismas instrucciones se tomarán en cuenta para la evaluación del proyecto.

## Instrucciones generales

Existe una universidad que desea implementar una nueva plataforma para . El diseño de la aplicación web no está terminado, pero existen algunas vistas que podrían servir de referencia que vamos a dejarte en este repositorio. Según las instrucciones que el cliente nos ha dado, te daré las instrucciones para completar el proyecto.

## Instrucciones del proyecto

Para este proyecto debes una plataforma con sistema de roles en el que cada uno tenga las siguientes funcionalidades:

### ADMIN

- Crear, Leer, Actualizar y Eliminar registros de maestros (CRUD).
- Crear, Leer, Actualizar y Eliminar registros de alumnos (CRUD).
- Crear, Leer, Actualizar y Eliminar clases/materias/cursos registrados (CRUD).
- Cambiar el rol de cada usuario (no se permite crear nuevos roles).

### MAESTRO

- Ver la clase a la que como maestro está asignado.
- Ver los datos de sus alumnos.

### ALUMNO

- Ver y cambiar las clases en las que está registrado.
- Ver sus calificaciones.

## Consideraciones para la calificación

A continuación te presentaremos los puntos que se tomarán en cuenta para la calificacion del proyecto:

- Te daremos una idea de interfaz de usuario (UI) como sugerencia. Sin embargo, no es obligatorio seguir estrictamente esa misma interfaz. Puedes cambiar a tu gusto los colores, tamaños de letra, etc. Pero debes respetar los colores del logo de la universidad o buscar otros que combinen con estos.
- La interfaz del usuario (UI) debe tener el logo de la universidad.
- Cada rol debe tener la funcionalidad especificada.
- El proyecto debe ser realizado con Tailwind CSS y este debe ser instalado por medio de la línea de comandos o la terminal, no debes usar el CDN.
- El proyecto debe ser estructurado de forma que sea fácil de entender y mantener.
- Debes subir los archivos de tu proyecto a un repositorio en GitHub y este debe tener más de un commit.
- Debes desplegar tu proyecto en algún hosting (como sugerencia, puedes usar 000webhost: https://www.000webhost.com/), y el link de tu página desplegada debe estar en el repositorio de GitHub.
- Si existiesen requerimientos extras que se hayan realizado (de la lista de consideraciones opcionales o de tu propia iniciativa), debes dejar una nota en el archivo README.md de tu repositorio en GitHub que especifique cada una.

### Consideraciones OPCIONALES que podrían sumar puntos:

- El diseño debe ser 100% responsive.
- Activar o desactivar a un usuario en el panel de administrador (quiere decir que si un usuario ha sido desactivado, no debería poder acceder con sus credenciales hasta que sea activado nuevamente).
- Las tablas tienen botones que permiten exportar los datos de las mismas en formato PDF, Excel, etc.
- El admin puede ver la cantidad de alumnos inscritos en cada clase.
- Cada maestro puede Crear, Leer, Actualizar y Eliminar calificaciones de sus alumnos.
- El alumno puede ver en la pestaña "Ver Calificaciones" un mensaje dejado por el maestro.
- Usar el plugin de Datatables (https://datatables.net/).
- Desarrollar toda la interfaz del usuario (UI) desde cero.
- Alguna otra funcionalidad acorde a la lógica del negocio.
