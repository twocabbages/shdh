# config valid only for Capistrano 3.1
lock '3.4.0'

set :application, 'shdh'
#set :repo_url, 'git@example.com:me/my_repo.git'
set :scm, :copy
set :exclude_dir, "{.svn,.git,vendor,Gemfile,Gemfile.*,Capfile,SCHILY.*,uploads}"
set :default_base_path, "http://127.0.0.1:810"

# Default branch is :master
# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }.call

# Default deploy_to directory is /var/www/my_app
set :deploy_to, '/var/www/html/garden-care'

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# set :linked_files, %w{config/database.yml}

# Default value for linked_dirs is []
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }
# set :default_env, { path: "~/.rbenv/shims:~/.rbenv/bin:$PATH" }

# Default value for keep_releases is 5

set :format, :pretty
set :log_level, :debug
set :keep_releases, 5



namespace :deploy do
  httpd_user = "www-data"
  httpd_group = "www-data"

  task :update_source do
    on roles(:all) do
	  puts "\n\n=== Svn update ===\n\n"
	  system "svn update"
	end
  end
  desc 'Restart application'
  task :restart do
    on roles(:all) do
      puts "restart app"
      execute "ln", "-s", "#{shared_path}/uploads", "#{current_path}/wp-content/uploads"
      # Your restart mechanism here, for example:
    end
  end

  desc "Update hat"
  task :update_hat do
    on roles(:all) do
      upload!(".htaccess", "#{current_path}")
    end
  end

  desc "export sql"
  task :export_sql do
    #sh "/usr/local/mysql/bin/mysqldump -u root wordpress > /Users/air/Downloads/sites/wordpress/shdh.sql"
    on roles(:all) do
      execute "cp", "--force", "#{current_path}/wp-config.#{fetch(:environment)}.php", "#{current_path}/wp-config.php"
      #upload!("shdh.sql", "#{current_path}")
    end
    #sh "rm /Users/air/Downloads/sites/wordpress/shdh.sql"
    #on roles(:all) do
    #  execute "echo", "DROP DATABASE IF EXISTS wordpress", "|", "mysql", "-u", "root", '"--password=!@#$%^&*()"'
    #  execute "echo", "CREATE DATABASE IF NOT EXISTS wordpress", "|", "mysql", "-u", "root", '"--password=!@#$%^&*()"'
    #  execute "nl", "#{current_path}/shdh.sql", "|",  "sed", "'s/127.0.0.1:803/shdh.com.au/g'"
    #  execute "mysql", "-u", "root", '"--password=!@#$%^&*()"', "wordpress", "<", "#{current_path}/shdh.sql"
    #  within current_path do
    #    execute "wp", "search-replace", "127.0.0.1:803", "shdh.com.au"
    #  end
    #end
  end

  after :publishing, :restart
  after :publishing, :update_hat
  after :publishing, :export_sql

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end
