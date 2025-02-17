package database

import (
	"errors"

	"github.com/ijoywan/laravel-echo-server-4-golang/options"
)

// Create a new database instance.
func NewDatabase(_options *options.Config) (DatabaseDriver, error) {
	switch _options.Database {
	case "redis":
		return NewRedisDatabase(_options)
	case "sqlite":
		return NewSQLiteDatabase(_options)
	}
	return nil, errors.New("The database driver is not set or the database driver is invalid.")
}
