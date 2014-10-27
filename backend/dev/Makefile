project_root:=$(CURDIR)


help:
	@echo "help"
	@echo "make tag       -- 打tag"
	@echo "make clean     -- 删除临时文件"



tag:
	/bin/bash /var/www/self/game/tools/git_tag.sh git_create_tag ${project_root}

clean:
	find . -name ".*.sw*" | xargs rm
