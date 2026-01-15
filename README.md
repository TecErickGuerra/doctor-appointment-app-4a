# doctor-appointment-app-4a
Proyecto de la materia Devops y Seguridad

Las configuraciones iniciales que se hicieron en el proyecto doctor-appointment-app-4a es que se modifico app.php para que el horario sea en america y merida.

Luego se uso la terminal para descargar los idiomas y configurar 'app.php' para que este puesto al español.

Los programas que se usaron como base para el servidor fueron XAMPP y myPhpAdmin.

# Panel Administrativo con Flowbite
Lo que se hizo a continuación fue integrar un panel administrativo en laravel, en donde al pegar la ruta con admin este te proyecta en el dashboard con un mensaje 'Hola desde Admin'.

Se añadieron archivos como admin.panel.php, el bashboard.blade.php, navigation-menu.blade.php y admin.blade.php para estructurar el panel desde la carpeta 'layouts'. También se añadio una carpeta 'admin' con dos archivos: navigation.blade.php y sidebar.blade.php, los cuales dan una estructura del diseño del dashboard.

Se uso Flowbite para consultar las partes del código laravel y CSS, asi dando una gran presentación del proyecto en poco tiempo y tenerlo listo a tiempo.

# Tablero de Proyectos en GitHub

Como parte del flujo de trabajo DevOps, se configuró un **tablero de proyectos (GitHub Projects)** para organizar, priorizar y dar seguimiento a las actividades de desarrollo del sistema durante el curso.

## Actividades Configuradas

Se definieron las siguientes 5 tareas principales, cada una con su descripción detallada y lista de verificaciones (checkmarks):

*   **Autenticación de usuarios y roles de acceso:** Implementar el sistema de login y definir permisos.
*   **Gestión de perfiles de doctores:** Crear y administrar la información profesional de los médicos.
*   **Gestión de perfiles de pacientes:** Crear y administrar la información de los pacientes.
*   **Agendamiento de citas:** Permitir que los pacientes soliciten y agenden citas médicas.
*   **Modificación de citas:** Habilitar la cancelación y reprogramación de citas existentes.

## Flujo de Trabajo en el Tablero

Cada actividad (representada como una *issue* o tarjeta) puede moverse entre las siguientes columnas, reflejando su estado actual:

1.  **Backlog:** Tareas pendientes por comenzar.
2.  **En Progreso:** Tareas en desarrollo activo.
3.  **En Revisión:** Tareas completadas en código, pendientes de revisión (por pares o QA).
4.  **Terminado:** Tareas finalizadas y listas para integrarse o desplegarse.

Este tablero proporciona una visión clara y en tiempo real del avance del proyecto.
