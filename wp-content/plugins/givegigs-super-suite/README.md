# GiveGigs Super Suite WordPress

A comprehensive project management tool suite for WordPress. Manage clients, projects, goals, focus areas, and tasks all within your WordPress admin.

## Features

- **Hierarchical Organization**: Organize your work in a logical hierarchy:
  - Clients
  - Projects (belong to Clients)
  - Goals (belong to Projects)
  - Focus (belong to Goals)
  - Tasks (belong to Focus)

- **Task Sizing**: Categorize tasks by size (S, M, L) for better planning and estimation.

- **Dashboard**: Get a quick overview of your entire project management system with statistics and recent items.

- **Integrated with WordPress**: Uses WordPress custom post types, making it fully compatible with the WordPress ecosystem.

## Installation

1. Upload the `givegigs-super-suite` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Access the GiveGigs Suite from the main menu in your WordPress admin.

## Usage

### Creating Your First Project

1. **Add a Client**: Start by creating a client (Companies or individuals you work with).
2. **Add a Project**: Create a project and assign it to a client.
3. **Add Goals**: Define goals for your project.
4. **Add Focus Areas**: Create focus areas for each goal.
5. **Add Tasks**: Create tasks within each focus area, specifying their size (S, M, L).

### Managing Your Work

- Use the dashboard to get a quick overview of all your work.
- Navigate through the hierarchy to find specific items.
- Filter and sort tasks by size, client, project, etc.

## Data Structure

The plugin uses a hierarchical structure of custom post types:

```
Client
└── Project
    └── Goal
        └── Focus
            └── Task (S, M, or L size)
```

## Support

For support or feature requests, please contact the plugin author.

## License

GPL v2 or later
